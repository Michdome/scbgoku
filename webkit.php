<?php 


  function Webkit_Post_Data($string, $first, $second, $third, $fourth){
    $result = '';
    $string = urlencode($string);
    $first = urlencode($first);
    $second = urlencode($second);

    for ($i = 1; $i < substr_count($string, $first) + 1; $i++){
      $one = explode($second, explode($first, $string)[$i])[0];
      $two = urlencode(trim(preg_replace('/\s\s+/', '', explode($fourth, explode($third, urldecode($string))[$i])[0])));
      $result .= $one."=".$two.'&';
      };

      return rtrim($result, '&');
  }


$webkit = '
------WebKitFormBoundaryeIJ83LqjOa1csH56
Content-Disposition: form-data; name="bundle_quantity_1"

1
------WebKitFormBoundaryeIJ83LqjOa1csH56
Content-Disposition: form-data; name="bundle_quantity_2"

1
------WebKitFormBoundaryeIJ83LqjOa1csH56
Content-Disposition: form-data; name="quantity"

1
------WebKitFormBoundaryeIJ83LqjOa1csH56
Content-Disposition: form-data; name="add-to-cart"

45279
------WebKitFormBoundaryeIJ83LqjOa1csH56
Content-Disposition: form-data; name="gtmkit_product_data"

{"id":"45279","item_id":"45279","item_name":"PT-141 (HA) 10mg","currency":"USD","price":51.69,"item_category":"Reproductive Health research peptide"}
------WebKitFormBoundaryeIJ83LqjOa1csH56
Content-Disposition: form-data; name="ct_bot_detector_event_token"

78436f4433bedab3e7ab7922d5cfc920049348d47b0360b16176aac886edf4e1
------WebKitFormBoundaryeIJ83LqjOa1csH56
Content-Disposition: form-data; name="apbct_visible_fields"

eyIwIjp7InZpc2libGVfZmllbGRzIjoicXVhbnRpdHkiLCJ2aXNpYmxlX2ZpZWxkc19jb3VudCI6MSwiaW52aXNpYmxlX2ZpZWxkcyI6ImJ1bmRsZV9xdWFudGl0eV8xIGJ1bmRsZV9xdWFudGl0eV8yIGd0bWtpdF9wcm9kdWN0X2RhdGEgY3RfYm90X2RldGVjdG9yX2V2ZW50X3Rva2VuIiwiaW52aXNpYmxlX2ZpZWxkc19jb3VudCI6NH19
------WebKitFormBoundaryeIJ83LqjOa1csH56--';



echo(Webkit_Post_Data($webkit, 'form-data; name="', '"', '"

', '-----'));
