<?php
/*        "url": "https://www.example.com/faq",
          "name": "FAQ on Widgets",
          "description": "Find answers to the most popular questions about our range of widgets",
*/


$itemsStr = '';
$countItem = count($items);

$i = 0;
foreach ($items as $k => $v) {
    $sep = ($countItem - 1 > $i) ? ',' : '';

    $itemsStr .=
        ' {
      "name": "Yamaguchi",
      "@type": "Question",
      "text": "' . $k . '",
      "dateCreated": "2019-01-27T14:01Z",
      "acceptedAnswer": {
      
        "@type": "Answer",      
        "text": "' . $v . '"
      }
      }
      ' . $sep;

    $i++;
}


$temp = '
{' .
    '   "@context": "https://schema.org",
         "@type": "FAQPage",       
           "mainEntity":    
        
        [
            ' . $itemsStr . '
        ]
    }
';
echo "<pre>"; print_r($temp);die();
echo $temp;
