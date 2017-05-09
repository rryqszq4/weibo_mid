# weibo_mid
Convert to weibo mid and base62 hash string for php.

test
----
```php
<?php
    require_once('weibo_mid');
    weibo_mid::test();
?>
```

```
//-> input
php weibo_mid.php

//-> output
id: 4079365341980588
mid: ExiEC8jeY
weibo_id: 4079365341980588

id: 4090576556902043
mid: EC0jdsXxh
weibo_id: 4090576556902043

id: 4090556357444653
mid: EBZMDveH3
weibo_id: 4090556357444653

id: 4090528670600488
mid: EBZ3Z2wdi
weibo_id: 4090528670600488
```
