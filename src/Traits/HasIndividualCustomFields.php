<?php

namespace Crankd\RapidCustomFields\Traits;

use stdClass;
use App\Models\FieldGroup;

use Illuminate\Support\Str;
use App\Models\SectionSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


trait HasIndividualCustomFields
{


    public function getRapidCustomFields($key = null)
    {

        if (!empty($key) && isset($this->rapid_custom_fields[$key])) {
            $columnName = $this->rapid_custom_fields[$key];
            return $this->{$columnName};
        }

        return $this->rapid_custom_fields;
    }


    public function getFieldValues()
    {
        $fields = $this->getRapidCustomFields('fields');
        $values = $this->getRapidCustomFields('values');

        return $this->formatFieldValue($fields, $values);
    }



    public function getFieldValuesFromPivotModel($model, $pivot = "section_settings_id")
    {

        $fields = $this->getRapidCustomFields('fields');

        // if is not object return empty array
        if (!is_object($this) || empty($this->fields)) {
            return [];
        }

        $modelValue =  $model::find($this->pivot->$pivot);
        $values = $modelValue->getRapidCustomFields('values');


        return $this->formatFieldValue($fields, $values);
    }


    public function formatFieldValue($fields, $values)
    {
        $fieldValues = [];
        if (empty($fields)) {
            return $fieldValues;
        }

        foreach ($fields as $key => $field) {
            $field->value = null;

            if (isset($values->{$field->key})) {
                $field->value = $values->{$field->key};

                if (isset($values->{$field->key}->value)) {
                    $field->value = $values->{$field->key}->value;
                }

                if ($field->type == 'repeater' && isset($values->{$field->key}->values)) {
                    $field->values = $values->{$field->key}->values;
                }
            }

            if ($field->type == 'link' && empty($field->value)) {
                $field->value = [
                    'label' => $field->title,
                    'show' => false,
                    'target' => '_self',
                    'type' => 'link',
                    'url' => '',
                    'title' => ''
                ];
            }

            $fieldValues[$field->key] = $field;
        }

        return $fieldValues;
    }
}
