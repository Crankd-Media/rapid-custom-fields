<?php

namespace Crankd\RapidCustomFields\Traits;

use stdClass;
use App\Models\FieldGroup;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


trait HasIndividualCustomFields
{

    public function getFieldValues()
    {
        $fieldValues = [];
        $fields = $this->{$this->rapid_custom_fields['fields']};
        $values = $this->{$this->rapid_custom_fields['values']};


        foreach ($fields as $field) {

            $field->value = null;

            if (isset($values->{$field->key})) {
                if ($field->type == 'repeater') {
                    $field->values = $values->{$field->key}->values;
                } else {
                    $field->value = $values->{$field->key}->value;
                }
            }
            $fieldValues[$field->key] = $field;
        }

        return $fieldValues;
    }
}
