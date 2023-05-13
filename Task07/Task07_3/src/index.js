export default class Vector {
    constructor(x, y, z) {
        this.x = x;
        this.y = y;
        this.z = z;
    }

    /**
     * Calculate the length of a vector in 3D space.
     *
     * @return {number} The magnitude of the vector.
     */
    get length() {
        return Math.sqrt(this.x * this.x + this.y * this.y + this.z * this.z);
    }

    /**
     * Adds the given vector to this vector and returns the resulting vector.
     *
     * @param {Vector} vector - The vector to add to this vector.
     * @return {Vector} A new vector that is the sum of this vector and the given vector.
     */
    add(vector) {
        return new Vector(this.x + vector.x, this.y + vector.y, this.z + vector.z);
    }

    /**
     * Subtract a given vector from this vector.
     *
     * @param {Vector} vector - The vector to subtract from this vector.
     * @return {Vector} A new Vector object representing the result of the subtraction.
     */
    sub(vector) {
        return new Vector(this.x - vector.x, this.y - vector.y, this.z - vector.z);
    }

    /**
     * Returns a new Vector object that is the product of the current vector
     * and a scalar number.
     *
     * @param {number} number - The scalar to multiply the vector by.
     * @return {Vector} A new Vector object representing the product of the
     * current vector and the scalar.
     */
    product(number) {
        return new Vector(this.x * number, this.y * number, this.z * number);
    }

    /**
     * Calculates the scalar product of this vector and the provided vector.
     *
     * @param {Vector} vector - The vector to calculate the scalar product with.
     * @returns {number} The scalar product of the two vectors.
     */
    scalarProduct(vector) {
        return this.x * vector.x + this.y * vector.y + this.z * vector.z;
    }

    /**
     * Calculates the vector product of two vectors.
     *
     * @param {Vector} vector - The vector to calculate the product with.
     * @return {Vector} The resulting vector.
     */
    vectorProduct(vector) {
        return new Vector(this.y * vector.z - this.z * vector.y,
            this.z * vector.x - this.x * vector.z,
            this.x * vector.y - this.y * vector.x);
    }

    /**
     * Returns a string representation of the current object.
     *
     * @return {string} A string in the format "(x, y, z)".
     */
    toString() {
        return `(${this.x};${this.y};${this.z})`;
    }
}
