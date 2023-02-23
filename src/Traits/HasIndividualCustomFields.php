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

        $values = $this->custom_field_values;
        $fields = $this->custom_fields;

        foreach ($fields as $field) {
            $fieldValues[$field->key] = isset($values[$field->key]) ? $values[$field->key] : null;
            if (isset($values[$field->key])) {
                $field->value = $values[$field->key];
            } else {
                $field->value = null;

                if ($field->type == 'link') {
                    $field->value = [
                        'label' => $field->title,
                        'type' => 'internal',
                        'show' => false,
                        'url' => null,
                        'title' => null,
                    ];
                }
            }
            $fieldValues[$field->key] = $field;
        }


        return $fieldValues;
    }
}
