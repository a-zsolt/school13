export function formatMoney(amount) {

    if (amount < 1000) {
        return `${amount} Ft`;
    }

    const thousands = Math.floor(amount / 1000);
    const remainder = amount % 1000;
    const remainderStr = remainder.toString().padStart(3, '0');

    amount = `${thousands} ${remainderStr}`;

    return `${amount} Ft`;
}

export function calculateTotal(itemsPrice, itemsCount) {
    return formatMoney(itemsPrice * itemsCount);
}