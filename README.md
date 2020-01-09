- For Upgrade and Dev Guideline or Workflow, check Documentation of phpThing Component.
- After following the guideline above from phpThing Component, add this code to doctrine.yaml
```
            Bean\Thing\Doctrine:
                is_bundle: false
                type: annotation
                dir: '%kernel.project_dir%/vendor/bean-component/php-thing/doctrine/Orm'
                prefix: 'Bean\Thing\Doctrine\Orm'
                alias: Bean\Thing\Doctrine
```

Run these commands
  - mv -f composer-travis.json composer.json

  - composer $ACTION
  - cp -R src/Controller src-symfony/
  - cp -R src/Entity src-symfony/
  - cp -R src/Migrations src-symfony/
  - cp -R src/Repository src-symfony/
  - cp -R src/Kernel.php src-symfony/
  - cp -R -f Resources/symfony5-doctrine.yaml config/packages/doctrine.yaml
  - cp -R -f Resources/symfony5-services.yaml config/services.yaml
  - cp -R -f Resources/symfony5-routes-annotations.yaml config/routes/annotations.yaml
  - cp -R -f form/Symfony/templates templates