

 interface Book {
    id: number;
    name: string;
    description: string;
    image: string;
    file: string;
    year: string;
    pages: string;
    isbn: string;
    edition: string;
    language: string;
    editorial: string;
    country: string;
    status: string;
    category_id: number;
    created_at: string;
    updated_at: string;
}


interface newBook extends Omit<Book, 'id' | 'created_at' | 'updated_at'> { }

export type { Book,newBook };