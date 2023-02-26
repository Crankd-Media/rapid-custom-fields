# Rapid Custom Fields

## LOAD JS FILES

composer require crankd/rapid-custom-fields
php artisan vendor:publish --tag=rapid-custom-fields-publishes

php artisan vendor:publish --provider="Crankd\RapidCustomFields\RapidCustomFieldsProvider"

Before Alpine.start(); add this line:
import "../../packages/crankd/rapid-custom-fields/resources/js/rapid-custom-fields";
