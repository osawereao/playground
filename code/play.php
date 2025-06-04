<?php
class Play
{
	private static $rd;
	private static $ds;
	private static $build;



	public static function init($rd, $ds)
	{
		if (!empty($rd)) {
			self::$rd = $rd;
		}

		if (!empty($ds)) {
			self::$ds = $ds;
		}

		return self::$build = self::$rd . self::$ds . 'build';
	}



	public static function title()
	{
		$title = 'Playground™';
		$page = self::slug();
		if (!empty($page)) {
			$title .= ' • ' . $page;
		}
		return self::formatTitle($title);
	}



	public static function asset($path, $echo = true)
	{
		$asset = '/asset/' . $path . '?' . mt_rand();
		if ($echo) {
			echo $asset;
			return;
		}
		return $asset;
	}



	public static function favicon($path, $echo = true)
	{
		return self::asset('favicon/' . $path . '.png', $echo);
	}



	public static function css($path, $echo = true)
	{
		return self::asset('css/' . $path . '.css', $echo);
	}



	public static function js($path, $echo = true)
	{
		return self::asset('js/' . $path . '.js', $echo);
	}



	public static function logo($path, $echo = true)
	{
		return self::asset('logo/' . $path . '.png', $echo);
	}



	public static function bit($slice, $include = true)
	{
		if (!empty($slice)) {
			$slice = self::$build . self::$ds . 'slice' . self::$ds . $slice . '.php';
		}

		if (file_exists($slice)) {
			if ($include) {
				include $slice;
			}
			return $slice;
		}

		return false;
	}



	public static function page($slug = null, $include = true)
	{
		if (!$slug) {
			$slug = self::slug();
		}

		if (!empty($slug)) {
			$slug = str_replace('/', self::$ds, $slug);
		} else {
			$slug = 'home';
		}

		$slug = self::$build . self::$ds . 'page' . self::$ds . $slug . '.php';
		$slug = strtolower($slug);

		if (file_exists($slug)) {
			if ($include) {
				include $slug;
			}

			return self::formatTitle(self::slug());
		}

		return false;
	}



	public static function form($field = null)
	{
		if (isset($_REQUEST[$field])) {
			return $_REQUEST[$field];
		}
	}



	public static function git()
	{
		if (!empty($_GET['command'])) {
			$command = $_GET['command'];
			$res['file'] = self::$build . self::$ds . 'git' . self::$ds . $command . '.php';
			$res['command'] = $command;
			return $res;
		}
		return [];
	}



	public static function gitCommand()
	{
		$res = self::git();
		if (!empty($res['command'])) {
			$cmdFile = $res['file'];
			if (file_exists($cmdFile)) {
				return include $cmdFile;
			}
		}
	}



	public static function gitTitle()
	{
		$res = self::git();
		if (!empty($res['command'])) {
			return ucwords($res['command']);
		}
	}



	public static function gitZero()
	{
		return self::$build . self::$ds . 'git'.self::$ds.'zero.php';
	}



	protected static function formatTitle($title)
	{
		$title = str_replace('/', ' » ', $title);
		$title = str_ireplace("html", "HTML", $title);
		$title = str_ireplace("php", "PHP", $title);
		return ucwords($title);
	}



	private static function slug()
	{
		$slug = $_GET['slug'] ?? '';
		return $slug;
	}
}