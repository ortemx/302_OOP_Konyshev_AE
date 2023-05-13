/* eslint-disable no-undef */
import Vector from '../src/index';

describe('Vector', () => {
    let vector0, vector1, vector2;

    beforeAll(() => {
        vector0 = new Vector(0, 0, 0);
        vector1 = new Vector(-6, 9, -2);
        vector2 = new Vector(8, -1, 4);
    });

    test('length', () => {
        expect(vector0.length).toBe(0);
        expect(vector1.length).toBe(11);
        expect(vector2.length).toBe(9);
        expect(new Vector(0, 1, 0).length).toBe(1);
    });

    test('add()', () => {
        expect(vector1.add(vector2).toString()).toBe('(2;8;2)');
    });

    test('sub()', () => {
        expect(vector1.sub(vector2).toString()).toBe('(-14;10;-6)');
        expect(vector2.sub(vector1).toString()).toBe('(14;-10;6)');
        expect(vector1.sub(vector1).toString()).toBe('(0;0;0)');
        expect(vector1.sub(vector0).toString()).toBe(vector1.toString());
    });

    test('product()', () => {
        let n = 3;
        expect(vector1.product(n).toString()).toBe('(-18;27;-6)');
        n = -3;
        expect(vector1.product(n).toString()).toBe('(18;-27;6)');
        n = 0;
        expect(vector1.product(n).toString()).toBe('(0;0;0)');
    });

    test('scalarProduct()', () => {
        expect(vector1.scalarProduct(vector2).toString()).toBe('-65');
        expect(vector2.scalarProduct(vector1).toString()).toBe('-65');
    });

    test('vectorProduct()', () => {
        expect(vector1.vectorProduct(vector2).toString()).toBe('(34;8;-66)');
        expect(vector2.vectorProduct(vector1).toString()).toBe('(-34;-8;66)');
    });

    test('toString()', () => {
        expect(vector1.toString()).toBe('(-6;9;-2)');
    });
});
