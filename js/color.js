
//funcion para elegir color en hexadecimal
const color = document.getElementById('colorInput');
const hex = document.getElementById('hexInput');

const color1 = document.getElementById('colorInput1');
const hex1 = document.getElementById('hexInput1');

// Normaliza a '#RRGGBB' mayúsculas
function normalizeHex(value) {
    if (!value) return '';
    value = value.trim();
    if (!value.startsWith('#')) value = '#' + value;
    // si viene en forma corta #abc -> convertir a #AABBCC (opcional)
    const shortMatch = value.match(/^#([0-9a-fA-F])([0-9a-fA-F])([0-9a-fA-F])$/);
    if (shortMatch) {
        value = '#' + shortMatch[1] + shortMatch[1] + shortMatch[2] + shortMatch[2] + shortMatch[3] + shortMatch[3];
    }
    if (/^#([0-9A-Fa-f]{6})$/.test(value)) {
        return value.toUpperCase();
    }
    return null; // inválido
}

// Inicializar vista
function applyColor(hexVal) {
    color.value = hexVal;
    hex.value = hexVal;
}
function applyColor1(hexVal) {
    color1.value = hexVal;
    hex1.value = hexVal;
}

// on color input change -> actualizar hex y preview
color.addEventListener('input', () => {
    var v = color.value; // ya viene en formato #rrggbb (minúsculas)
    var norm = v.toUpperCase();
    hex.value = norm;
});
color1.addEventListener('input', () => {
    var v1 = color1.value; // ya viene en formato #rrggbb (minúsculas)
    var norm1 = v1.toUpperCase();
    hex1.value = norm1;
});


// on hex input (live) y on blur validar y aplicar si es correcto
hex.addEventListener('input', () => {
    // permitir escribir sin # mientras tipeas; no aplicar si inválido
    var norm = normalizeHex(hex.value);
    if (norm) {
        color.value = norm;
        hex.value = norm; // fuerza mayúsculas y #
    }
});
hex1.addEventListener('input', () => {
    // permitir escribir sin # mientras tipeas; no aplicar si inválido
    var norm1 = normalizeHex(hex.value);
    if (norm1) {
        color1.value = norm1;
        hex1.value = norm1; // fuerza mayúsculas y #
    }
});

// si el usuario pega o sale del input, normalizar o restaurar el valor anterior
hex.addEventListener('blur', () => {
    var norm = normalizeHex(hex.value);
    if (!norm) {
        // restaurar al valor del color picker si está mal
        hex.value = color.value.toUpperCase();
    }
});
hex1.addEventListener('blur', () => {
    var norm1 = normalizeHex(hex1.value);
    if (!norm1) {
        // restaurar al valor del color picker si está mal
        hex1.value = color1.value.toUpperCase();
    }
});