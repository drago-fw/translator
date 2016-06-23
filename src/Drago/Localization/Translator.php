<?php

/**
 * This file is part of the Drago Framework
 * Copyright (c) 2015, Zdeněk Papučík
 */
namespace Drago\Localization;

use Nette;
use Exception;

/**
 * Translator adapter.
 * @author Zdeněk Papučík
 */
class Translator implements Nette\Localization\ITranslator
{
	/**
	 * List of words for translation.
	 * @var array
	 */
	private $message;

	public function __construct($path)
	{
		$file = $path . '.ini';
		if (!is_file($file)) {
			throw new Exception('Missing translation file in ' . $file);
		}

		$this->message = parse_ini_file($file);
	}

	/**
	 * Translates the given string.
	 * @param  string
	 * @param  int
	 * @return string
	 */
	public function translate($message, $count = NULL)
	{
		if ($count === NULL) {
			$count = 1;
		}

		return isset($this->message[$message]) ? $this->message[$message] : $message;
	}

}
