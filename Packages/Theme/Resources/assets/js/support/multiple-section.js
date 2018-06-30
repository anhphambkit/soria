let Handlebars = require('handlebars');
import floatLabel from '@theme/inc/float-label';
class MultipleSection {
    constructor(){
        this.source = '#section-list';
        this.template = '#banner-multiple-section';
        this.removeEl = '#asda';
        this.addEl = '#asda';
        this.defaultModel = { id: null, name: null };
        this.list = [];
    }

    add(model){
        this.list.push(model);
        this.parseTemplate();
    }

    parseTemplate(){
        var source = $(this.template).html();
        var template = Handlebars.compile(source);
        $(this.source).html(template(this.list));
        this.handleRemove();
        floatLabel.init();
    }

    handleAdd(){
        let section = this;
        $(this.addEl).on('click', function(){
            section.list.push(JSON.parse(JSON.stringify(section.defaultModel)));
            section.parseTemplate();
        });
    }

    handleRemove(){
        let section = this;
        $(this.removeEl).on('click', function(){
            let index = parseInt($(this).attr('data-index'));
            section.list.splice(index, 1);
            section.parseTemplate();
        });
    }
}
export default MultipleSection