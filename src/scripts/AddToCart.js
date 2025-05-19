import React from 'react';
import { useState } from '@wordpress/element';

const AddToCart = ({ productId }) => {
    const [loading, setLoading] = useState(false);

    const handleAddToCart = async () => {
        setLoading(true);
        try {
            const response = await fetch('/wp-json/wc/store/cart/add-item', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-WC-Store-API-Nonce': window.wc.wcSettings.nonce
                },
                body: JSON.stringify({
                    id: productId,
                    quantity: 1
                })
            });
            // Handle response
        } finally {
            setLoading(false);
        }
    };

    return (
        <button 
            onClick={handleAddToCart}
            className="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark transition-colors"
            disabled={loading}
        >
            {loading ? 'Adding...' : 'Add to Cart'}
        </button>
    );
};

export default AddToCart;