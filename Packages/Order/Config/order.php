<?php
return [
    // Default tax and fee-ship when checkout Cart, it won't apply when create/update order
    'tax'   => 10, // 0% tax default tax when checkout cart
    'tax-when-total-more-than'  => 100000, // Tax will include when total billing greater than 100 0000
    'fee-ship'  => 25000, // Fee ship
    'no-fee-ship-when-more-than'  => 10000000, // No fee ship if total billing more than ...
];