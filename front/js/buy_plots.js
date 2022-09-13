function buy_plot_invoice() {
    const options = {
        method: 'POST',
        headers: {
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'X-CC-Api-Key': 'b0e799a4-2eb9-44e4-b1d0-a5fe5a31d488'
        },
        body: JSON.stringify({
            local_price: {amount: 1, currency: 'EUR'},
            business_name: 'Subversum',
            customer_email: 'customer_email@mail.ru',
            customer_name: 'customer_name'
        })
    };

    fetch('https://api.commerce.coinbase.com/invoices', options)
        .then(response => response.json())
        .then(response => console.log(response))
        .catch(err => console.error(err));
}

function buy_plot_charge(){
    const options = {
        method: 'POST',
        headers: {
            Accept: 'application/json',
            'Content-Type': 'application/json',
            'X-CC-Api-Key': 'b0e799a4-2eb9-44e4-b1d0-a5fe5a31d488'
        },
        body: JSON.stringify({
            local_price: {amount: 1, currency: 'USD'},
            metadata: {customer_id: 'cust_id', customer_name: 'cust_name'},
            name: 'Subversum',
            description: 'Buy game plot',
            pricing_type: 'fixed_price',
            redirect_url: 'https://subversum.space',
            cancel_url: 'https://subversum.space'
        })
    };

    fetch('https://api.commerce.coinbase.com/charges', options)
        .then(response => response.json())
        .then(response => console.log(response))
        .catch(err => console.error(err));
}

