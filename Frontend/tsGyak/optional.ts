function generateError(msg?: string): never {
    throw new Error(`Generating Error: ${msg}`);
}

generateError()
generateError('szia');

function process(val: unknown) {
    if (val === null) {}
}

// unknown
function processs(val) {
    if (typeof val === 'object' && !!val && 'log' in val && typeof val.log === 'function') {
        val.log();
    }
}