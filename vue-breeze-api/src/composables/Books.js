import { ref } from "vue"
import axios from "axios"
import { useRouter } from "vue-router"

export default function apiBooks(){
    const books = ref([]);
    const book = ref([]);
    const errors = ref([]);
    const router = useRouter();

    const getBooks = async() => {
        const response = await axios.get("api/v2/books");
        books.value = response.data;
    }


    return {
        books,getBooks
    }
}