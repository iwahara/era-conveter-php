# era-conveter
西暦から和暦に変換するシンプルなライブラリです。

```php
use Iwahara\EraConveter\WarekiConverter;

$datetime = new DateTimeImmutable("2022-05-01 00:00:00");
$converter = new WarekiConverter();
$wareki = $converter->convert($datetime);

echo $wareki // 令和元年5月1日

echo $wareki->getGengo() // 令和
echo $wareki->getYear() // 1
echo $wareki->getMonth() // 5
echo $wareki->getDay() // 1

```

## Installation

```
composer require iwahara/era-conveter
```