```php
use Laravel\Nova\Fields\ID;
use YMartini\Nova\Fields\QRCodeReader\Field as QRCodeReader;

QRCodeReader::make(ID::make()),
```