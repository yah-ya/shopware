import Plugin from 'src/plugin-system/plugin.class';

export default class MinQuantityWarningPlugin extends Plugin {
    static options = {
        quantitySelector: 'input[name="lineItems[{{ productId }}][quantity]"]',
        warningContainer: '.min-quantity-warning-container'
    };

    init() {
        console.log('MinQuantityWarningPlugin: Initializing');
        console.log('MinQuantityWarningPlugin: Element:', this.el);
        
        const productId = this.el.dataset.productId;
        const selector = this.options.quantitySelector.replace('{{ productId }}', productId);
        console.log('MinQuantityWarningPlugin: Looking for selector:', selector);
        
        this.quantityInput = document.querySelector(selector);
        console.log('MinQuantityWarningPlugin: Quantity input found:', this.quantityInput);
        
        if (!this.quantityInput) {
            console.log('MinQuantityWarningPlugin: No quantity input found');
            return;
        }

        this.quantityInput.addEventListener('change', this.onQuantityChange.bind(this));
        console.log('MinQuantityWarningPlugin: Change event listener attached');
        
        // Also check on initial load
        this.checkQuantity(this.quantityInput.value, productId);
    }

    onQuantityChange(event) {
        console.log('MinQuantityWarningPlugin: Quantity changed to:', event.target.value);
        const quantity = event.target.value;
        const productId = this.el.dataset.productId;

        this.checkQuantity(quantity, productId);
    }

    checkQuantity(quantity, productId) {
        console.log('MinQuantityWarningPlugin: Checking quantity:', quantity, 'for product:', productId);
        const url = window.router['frontend.min-quantity-warning.check'];
        console.log('MinQuantityWarningPlugin: URL:', url);
        
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `quantity=${quantity}&productId=${productId}`
        })
        .then(response => response.text())
        .then(html => {
            console.log('MinQuantityWarningPlugin: Response received');
            const container = this.el.querySelector(this.options.warningContainer);
            if (container) {
                container.innerHTML = html;
            }
        })
        .catch(error => {
            console.error('MinQuantityWarningPlugin: Error:', error);
        });
    }
} 