<?php

declare(strict_types=1);

/*
 * This file is part of the PHPColor library.
 *
 * (c) Simon André & Raphaël Geffroy
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace PhpColor\Colors\Apple;

/**
 * @implements \IteratorAggregate<string, string>
 */
final class AppleColors extends \stdClass implements \IteratorAggregate, \Countable
{
    /**
     * @var array<string, array<string, string>>
     */
    private static array $files = [];

    public const string THEME_LIGHT = 'light';

    public const string THEME_DARK = 'dark';

    public static function iOS(string $theme = self::THEME_LIGHT): self
    {
        return self::create('iOS', $theme);
    }

    public static function macOS(string $theme = self::THEME_LIGHT): self
    {
        return self::create('macOS', $theme);
    }

    public static function tvOS(string $theme = self::THEME_LIGHT): self
    {
        return self::create('tvOS', $theme);
    }

    public static function visionOS(): self
    {
        return self::create('visionOS');
    }

    public static function watchOS(string $theme = self::THEME_LIGHT): self
    {
        return self::create('watchOS', $theme);
    }

    private static function create(string $file, ?string $theme = null): self
    {
        if ($theme && !in_array($theme, [self::THEME_LIGHT, self::THEME_DARK])) {
            throw new \InvalidArgumentException(sprintf('The theme "%s" does not exist.', $theme));
        }

        $file = self::$files[$file] ??= require __DIR__.'/Resources/colors/'.$file.'.php';

        return new self($theme ? $file[$theme] : $file);
    }

    /**
     * @param array<string, array{string, string[]}> $colors
     */
    private function __construct(private readonly array $colors)
    {
    }

    public function has(string $name): bool
    {
        return array_key_exists($name, $this->colors);
    }

    public function get(string $name): string
    {
        if (!$this->has($name)) {
            throw new \InvalidArgumentException(sprintf('The color "%s" does not exist.', $name));
        }

        return $this->colors[$name][0];
    }

    /**
     * @return list<string>
     */
    public function getNames(): array
    {
        return array_keys($this->colors);
    }

    /**
     * @return \ArrayIterator<string, string>
     */
    public function getIterator(): \Iterator
    {
        return new \ArrayIterator(array_map(fn ($a) => $a[0], $this->colors));
    }

    public function count(): int
    {
        return count($this->colors);
    }

    public function __get(string $name): string
    {
        return $this->get($name);
    }

    public function __set(string $name, mixed $value): void
    {
        throw new \BadMethodCallException('AppleColors are read-only.');
    }
}
