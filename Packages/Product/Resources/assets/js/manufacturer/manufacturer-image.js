import ImportImage from '@theme/support/import-image';
class ManufacturerImage extends ImportImage{
    constructor() {
        super();
        this.isSingle = true;
        this.template = '#manufacturer-single-image-img-template';
        this.source = '#manufacturer-source-template';
    }
}

export default ManufacturerImage;