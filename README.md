# laminas-bootstrapdatepicker

laminas-bootstrapdatepicker

zend framework 3 bootstrap datepicker

##Installation

1) Ajouter l'exigence suivante à votre fichier composer.json.
Dans la section:"require"

```php
composer require jenzri-nizar/laminas-bootstrapdatepicker v1.0
```
2) Ouvrez votre ligne de commande et exécutez

```php
composer update
```

Le module doit être enregistré dans **config/modules.config.php**
```php
'modules' => array(
    '...',
    'Laminas\Form',
    'laminas\Bootstrapdatepicker'
),
```


##Exemple
```php
$this->add(array(
            'name' => 'id',
            'type' => 'laminas\Bootstrapdatepicker\Form\Element\Datepicker',
            'attributes'=>array(
                'class'=>'form-control',
            ),
            'options'=>array(
                'settings'=>array(
                    'id'=>"data",
                    'datepicker'=>array(
                        "format"=>"mm/dd/yyyy",
                        "startDate"=>"-3d",
                        "language"=> 'fr'
                    ),
                    "icon"=>"true",
                    "icon-class"=>"glyphicon glyphicon-th"
                )
            )

        ));
```

form.phtml

```php
echo $this->datepicker($form->get('id'));
```
![alt tag](https://raw.githubusercontent.com/jenzri-nizar/laminas-bootstrapdatepicker/master/Capture.PNG)