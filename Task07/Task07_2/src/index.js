const vectorPrototype = {
    getLength() {
        return Math.sqrt(this.x * this.x + this.y * this.y + this.z * this.z);
    },
    add(vector) {
        return createvector(this.x + vector.x, this.y + vector.y, this.z + vector.z);
    },
    sub(vector) {
        return createvector(this.x - vector.x, this.y - vector.y, this.z - vector.z);
    },
    product(number) {
        return createvector(this.x * number, this.y * number, this.z * number);
    },
    scalarProduct(vector) {
        return (this.x * vector.x + this.y * vector.y + this.z * vector.z);
    },
    vectorProduct(vector) {
        return createvector(
            this.y * vector.z - this.z * vector.y,
            this.z * vector.x - this.x * vector.z,
            this.x * vector.y - this.y * vector.x
        );
    },
    toString() {
        return `(${this.x};${this.y};${this.z})`;
    }
};

export default function createvector(x, y, z) {
    const vector = { x, y, z };
    Object.setPrototypeOf(vector, vectorPrototype);
    return vector;
}
