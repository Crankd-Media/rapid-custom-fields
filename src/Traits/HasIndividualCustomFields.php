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

    public function getFieldValues()
    {
        $fieldValues = [];

        $fields = $this->{$this->rapid_custom_fields['fields']};
        $values = $this->{$this->rapid_custom_fields['values']};

        if (count($fields)) {
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
        }

        return $fieldValues;
    }
    public function getFieldValuesFromSettings($section = [])
    {

        // if is not object return empty array
        if (!is_object($section)) {
            return [];
        }

        $fieldValues = [];
        $section_fields =  $section->fields;

        if (empty($section_fields)) {
            return [];
        }

        $sectionSetting = SectionSetting::find($section->pivot->section_settings_id);

        $values = $sectionSetting->settings;


        foreach ($section_fields as $key => $field) {
            $field->value = null;

            if (isset($sectionSetting->settings->{$field->key})) {
                $section_value = $sectionSetting->settings->{$field->key};
                $field->value = $section_value;
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


            if (isset($values->{$field->key})) {
                if ($field->type == 'repeater') {
                    $field->values = $values->{$field->key}->values;
                }
            }



            $fieldValues[$field->key] = $field;
        }

        return $fieldValues;
    }
}
