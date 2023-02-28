import { setBasePath } from "@shoelace-style/shoelace/dist/utilities/base-path.js";
setBasePath("/");

import "@shoelace-style/shoelace/dist/components/alert/alert.js";
import "@shoelace-style/shoelace/dist/components/button/button.js";
import "@shoelace-style/shoelace/dist/components/icon/icon.js";

import "@shoelace-style/shoelace/dist/components/icon-button/icon-button.js";

import "@shoelace-style/shoelace/dist/components/dialog/dialog.js";
// tooltip
import "@shoelace-style/shoelace/dist/components/tooltip/tooltip.js";
// import all components
// import "@shoelace-style/shoelace/dist/components/all.js";

import "@shoelace-style/shoelace/dist/components/input/input.js";
import "@shoelace-style/shoelace/dist/components/drawer/drawer.js";

import "@shoelace-style/shoelace/dist/components/card/card.js";

import axios from "axios";

import Swal from "sweetalert2";

import collect from "collect.js";

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

// render-repeater-fields
import EditRepeaterItem from "./alpine-components/edit-repeater-item.ts";
Alpine.data("EditRepeaterItem", EditRepeaterItem);

Alpine.magic("clipboard", () => {
  return (subject) => navigator.clipboard.writeText(subject);
});

Alpine.directive(
  "rapid-slug",
  (el, { expression }, { evaluateLater, effect }) => {
    let setInputValue = evaluateLater(expression);
    effect(() => {
      setInputValue((string) => {
        el.value = string.toLowerCase().replace(/\s+/g, "_");

        // el.value = slugify(string, {
        //     lower: true,
        //     replacement: "_",
        // });
      });
    });
  }
);
