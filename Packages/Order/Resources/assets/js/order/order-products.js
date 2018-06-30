let Handlebars = require('handlebars');
Handlebars.registerHelper('rowClass', function(index) {
    return index % 2 == 1 ? 'odd':'even';
});
Handlebars.registerHelper('itemTotal', function(salePrice, qty) {
    return salePrice * qty;
});

import '@theme/util/string-util'; // Auto register format number handlebars
class OrderProducts {
    constructor(){
        this.products = [
            {
                product_id: 1,
                name: 'NBA',
                price: 90,
                img: 'http://asdasdasdas.com',
                sale_price: 10,
                quantity: 1,
                sku: 'DDD34A',
                link: '#'
            }
        ];

        this.subTotal = 0;
        this.total = 0;
        this.feeship = 0;
        this.tax = 0;
        this.apiCalBilling = '#';

        this.template = '#product-list-template';
        this.injectTemplate = '#product-list-inject';
    }

    /**
     * Remove products
     * @param index
     */
    remove(index){
        this.products.splice(index,1);
        this.parseTemplate();
    }
    /**
     * Update quantity
     * @param index
     * @param qty
     */
    update(index, qty){
        this.products[index].quantity = qty;
        this.parseTemplate();
    }

    /**
     * Update subtotal and total
     */
    calTotal(){
        return $.post(this.apiCalBilling, {
            products: this.products,
            tax: this.tax,
            fee_ship: this.feeship
        })
    }

    /**
     * Parse template to inject template HTML
     */
    parseTemplate(){
        let f = this;
        this.calTotal().then(function(res){
            var source = $(f.template).html();
            var template = Handlebars.compile(source);
            $(f.injectTemplate).html(template({
                products: f.products,
                subTotal: res.data.subTotal,
                total: res.data.total,
                feeship: f.feeship,
                tax: parseFloat(res.data.tax),
                taxValue: parseFloat(res.data.taxValue),
            }));
        });

    }
}

export default OrderProducts;