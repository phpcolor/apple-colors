<h1 align="center">Apple Colors</h1>
<p align="center">This package provides access to the color palettes used in Apple interfaces.</p>
<img src="Resources/colors.svg" alt="Apple Colors" width="100%">

## Installation

```bash
composer require phpcolor/apple-colors
```

## Usage

### Color Palettes

```php
use PhpColor\Colors\Apple\AppleColors as Apple;

$colors = Apple::iOS();
$colors = Apple::iPadOS();
$colors = Apple::macOS();
$colors = Apple::tvOS();
$colors = Apple::visionOS();
$colors = Apple::watchOS();
```

### Themes

```php
use PhpColor\Colors\Apple\AppleColors as Apple;

$colors = Apple::macOS('light');
$colors = Apple::macOS('dark');

$colors = Apple::iOS('light');
$colors = Apple::iOS('dark');

// visionOS has only one theme
$colors = Apple::visionOS();
```

### Color names

```php
use PhpColor\Colors\Apple\AppleColors as Apple;

$colors = Apple::watchOS();

$names = $colors->getNames(); 
// 'red', 'orange', 'yellow', 'green', 'mint', 'teal', 'cyan',
// 'blue', 'indigo', 'purple', 'pink', 'brown', 'gray'
```

### Color values

```php
use PhpColor\Colors\Apple\AppleColors as Apple;

$colors = Apple::macOS();

echo $colors->blue;             // #007AFF
echo $colors->get('indigo');    // #5856D6
```

---

![Apple Colors](Resources/colors.svg)

## Credits

The colors listed in this project are based on the colors used by [Apple](https://www.apple.com/). 

## License

This [PHPColor](https://phpcolor.dev) package is released under the [MIT license](LICENSE).
