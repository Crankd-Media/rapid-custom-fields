import Alpine from "alpinejs";

// Render Fields
import RenderCustomFields from "./alpine-components/render-custom-fields.ts";
Alpine.data("RenderCustomFields", RenderCustomFields);

import EditFieldSettings from "./alpine-components/edit-field-settings.ts";
Alpine.data("EditFieldSettings", EditFieldSettings);

import RenderFieldValues from "./alpine-components/render-field-values.ts";
Alpine.data("RenderFieldValues", RenderFieldValues);

// Field-input
import FieldInputRepeater from "./alpine-components/field-input/repeater.ts";
Alpine.data("FieldInputRepeater", FieldInputRepeater);

import FieldInputImage from "./alpine-components/field-input/image.ts";
Alpine.data("FieldInputImage", FieldInputImage);

import FieldInputLink from "./alpine-components/field-input/link.ts";
Alpine.data("FieldInputLink", FieldInputLink);

import EditRepeaterItem from "./alpine-components/edit-repeater-item.ts";
Alpine.data("EditRepeaterItem", EditRepeaterItem);
