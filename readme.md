# Object Validator

| Build | Coverage | Downloads | Release | License |
|:--------:|:--------:|:--------:|:--------:|:--------:|
| [![Build Status](https://travis-ci.com/narokishi/object-validator.svg?branch=master)](https://travis-ci.com/narokishi/object-validator) | [![Coverage Status](https://coveralls.io/repos/github/narokishi/object-validator/badge.svg?branch=master)](https://coveralls.io/github/narokishi/object-validator?branch=master) | [![Total Downloads](https://poser.pugx.org/narokishi/object-validator/downloads)](https://packagist.org/packages/narokishi/object-validator) | [![Latest Stable Version](https://poser.pugx.org/narokishi/object-validator/v/stable)](https://packagist.org/packages/narokishi/object-validator) | [![License](https://poser.pugx.org/narokishi/object-validator/license)](https://packagist.org/packages/narokishi/object-validator) |



## Description

"ObjectValidator" is a **PHP** package, which allows to validate given class (eg. stdClass incoming from request) to be validated with custom rules. Strongly recommended for generic views.

## Installation
### Composer
Installing via [Composer](https://getcomposer.org/download/) will keep this package up to date for you.
```bash
composer require narokishi/object-validator
```
### Usage
```php
use Narokishi\ObjectValidator\Validators\CompensationValidator;
use Narokishi\ObjectValidator\ValidationException;

...

try {
    (new CompensationValidator($class))
        ->applyPrefix('compensation')
        ->withThrow();
} catch (ValidationException $e) {
    // Apply errors to view or whatever
}
```

## Contributing
Thank you for considering contributing to the package.

### Running tests
```bash
composer tests
composer tests-windows
```
### Submitting a Patch
- Fork the Repository
- After the action has completed, clone your fork locally
```bash
git clone git@github.com:{username}/object-validator.git
cd number-to-words
git remote add upstream git://github.com/narokishi/object-validator.git
```
- Check that tests pass
- Create and work on your own topic branch
```bash
git checkout -b {branch} master
```
- Prepare your patch (while rebasing you might have to resolve conflicts)
```bash
git checkout master
git fetch upstream
git merge upstream/master
git checkout BRANCH_NAME
git rebase master
```
- In case of conflicts
```bash
 git add {files}
 git rebase --continue
```
- Check that all tests pass and push your branch
```bash
 git push origin {branch} --force
```
- Make a Pull Request on narokishi/object-validator repository
