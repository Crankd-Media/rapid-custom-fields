
export default (intValue = null) => ({
    repeater: intValue,
    init() {
        console.log("Repeater int");
        console.log(this.repeater);
    },
    addValue(value) {
        console.log("addValue");
        console.log(value);
        console.log(this.repeater.values);
        this.repeater.values.push({ value: value });
    },
    updateValue(value, index) {
        this.repeater.values[index].value = value;
    },
    addItem() {
        window.dispatchEvent(
            new CustomEvent("open-edit-repeater-item", {
                detail: {
                    callback: this.addValue.bind(this),
                    fields: Alpine.raw(this.repeater.fields).items,
                },
            })
        );
    },
    editItem(index) {
        window.dispatchEvent(
            new CustomEvent("open-edit-repeater-item", {
                detail: {
                    callback: this.updateValue.bind(this),
                    fields: Alpine.raw(this.repeater.fields),
                    item: this.repeater.values[index],
                    index: index,
                },
            })
        );
    },
    removeItem(index) {
        this.repeater.values.splice(index, 1);
    },
});
