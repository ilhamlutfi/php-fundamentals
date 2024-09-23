// helper untuk mengubah text menjadi slug
const slugify = (text) => {
    return text.trim()
        .toLowerCase()
        .replace(/\s+/g, '-') // Ganti spasi dengan -
        .replace(/[^\w\-]+/g, '') // Hapus karakter non-alphanumeric
        .replace(/-+/g, '-'); // Ganti beberapa - dengan satu
}
