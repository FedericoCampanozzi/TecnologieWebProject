function Color(r, g, b, a) {
    this.r = parseFloat(r);
    this.g = parseFloat(g);
    this.b = parseFloat(b);
    this.a = parseFloat(a);
}

function colorLerp(a, b, t) {
    c = new Color(255, 255, 255, 255);
    c.r = a.r + (b.r - a.r) * t,
        c.g = a.g + (b.g - a.g) * t,
        c.b = a.b + (b.b - a.b) * t,
        c.a = a.a + (b.a - a.a) * t
    return "rgba(" + c.r + "," + c.g + "," + c.b + "," + c.a + ")";
}