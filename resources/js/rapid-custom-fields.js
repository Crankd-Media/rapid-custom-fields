import Swal from "sweetalert2";
window.Swal = Swal;

window.SweetalertOptions = {
    confirmButtonText: "Yes, delete it!",
    confirmButtonColor: "#E33430",
    cancelButtonColor: "#6c757d",
    confirmButtonClass: "btn btn-danger",
    cancelButtonClass: "btn btn-lighter",
};

import Alpine from "alpinejs";

// Render Fields
import RenderCustomFields from "./alpine-components/render-custom-fields";
Alpine.data("RenderCustomFields", RenderCustomFields);

import EditFieldSettings from "./alpine-components/edit-field-settings";
Alpine.data("EditFieldSettings", EditFieldSettings);

import RenderFieldValues from "./alpine-components/render-field-values";
Alpine.data("RenderFieldValues", RenderFieldValues);

// Field-input
import FieldInputRepeater from "./alpine-components/field-input/repeater";
Alpine.data("FieldInputRepeater", FieldInputRepeater);

import FieldInputImage from "./alpine-components/field-input/image";
Alpine.data("FieldInputImage", FieldInputImage);

Alpine.magic("clipboard", () => {
    return (subject) => navigator.clipboard.writeText(subject);
});

import slugify from "slugify";

Alpine.directive(
    "rapid-slug",
    (el, { expression }, { evaluateLater, effect }) => {
        let setInputValue = evaluateLater(expression);
        effect(() => {
            setInputValue((string) => {
                el.value = slugify(string, {
                    lower: true,
                    replacement: "_",
                });
            });
        });
    }
);
