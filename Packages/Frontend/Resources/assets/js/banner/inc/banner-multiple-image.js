import MultipleSection from '@theme/support/multiple-section';
class BannerMultipleSection extends MultipleSection {
    constructor(){
        super();
        this.removeEl = '#section-list i[data-control="remove"]';
        this.addEl = '#add-banner-image';
        this.source= '#section-list';
        this.template = '#banner-multiple-section';
        this.selectingSection = 0;

        // The model each section will be added to list
        this.defaultModel = {
            title: null,
            desc: null,
            link: null,
            img: { id: null, link: null } // Image in section
        };
        this.handleAdd();
    }

    /**
     * Attach image to section
     * @param id
     * @param link
     * @param medium
     * @param small
     */
    attach(id, link, medium, small){
        this.list[this.selectingSection].img = { id, link };
        this.parseTemplate();
    }

    /**
     * Handle remove
     */
    handleRemove(){
        let section = this;
        $(this.removeEl).on('click', function(){
            let index = parseInt($(this).attr('data-index'));
            section.list.splice(index, 1);
            section.parseTemplate();
        });
    }
}
export default BannerMultipleSection