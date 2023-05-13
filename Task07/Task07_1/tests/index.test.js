import createVector from '../src/index';

describe('createVector', () => {
    let vector0, vector1, vector2;

    beforeAll(() => {
        vector0 = new createVector(0, 0, 0);
        vector1 = new createVector(-6, 9, -2);
        vector2 = new createVector(8, -1, 4);
    });

    test('getLength()', () => {
        expect(vector0.getLength()).toBe(0);
        expect(vector1.getLength()).toBe(11);
        expect(vector2.getLength()).toBe(9);
        expect(new createVector(0, 1, 0).getLength()).toBe(1);
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
