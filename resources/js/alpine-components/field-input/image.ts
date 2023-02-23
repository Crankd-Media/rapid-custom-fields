export default (intField) => ({
    field: intField,
    image: intField.value != null ? intField.value : { value: { value: "" } },
    max_selected: 1,
    has_media_library: true,
    init() {
        console.log(this.image);

        this.field.value = this.field.value || null;

    },
    uploadImage() {

        if (this.has_media_library) {
            this.openMediaLibrary();
        }else{
            this.openFileManager();
        }
        
    },
    setImage(image) {
        // if is array image and max_selected is 1 then set image to first item
        if (Array.isArray(image) && this.max_selected === 1) {
            console.log();
            this.image = image[0];
        } else {
            this.image = image;
        }

        console.log(this.image);
    },
    openMediaLibrary() {
        console.log('openMediaLibrary');

        window.dispatchEvent(
            new CustomEvent("open-medialibrary", {
                detail: {
                    callback: this.setImage.bind(this),
                    selected: this.image,
                    max_selected: this.max_selected,
                },
            })
        );
    },
    openFileManager() {
        console.log('openFileManager');

        // open browser file manager then set image to file uploaded
        const fileInput = document.createElement('input');
        fileInput.type = 'file';
      
        fileInput.onchange = () => {
          const file = fileInput.files[0];
          const reader = new FileReader();
      
          reader.onload = () => {
            console.log(reader.result);
            // const preview = document.createElement('img');
            // preview.src = reader.result;
            // document.body.appendChild(preview);
          };
      
          if (file) {
            reader.readAsDataURL(file);
          }
        };
      
        fileInput.click();


    },
    removeImage() {
        this.image = [];
    },
});