<template>
  <section>
    <header>
      <h1>My books {{getStatus()}}</h1>
    </header>
    <book-form @addBook="bookToAdd"></book-form>
    <ul>
      <book-card v-for="book of books" :key="book.id" :book="book" @deleteBook="bookToDelete"></book-card>
    </ul>
  </section>
</template>

<script>

import axios from "axios";

const API_URL = "http://127.0.0.1:8000/api/books";

export default {
  data() {
    return {
      books : [],
    };
  },
  methods: {
    getStatus(){
      return process.env.VUE_APP_MODE;
    },
    getAllBooks(){
      axios.get(API_URL).then(response=>{
        this.books = response.data;
      }).catch(error=>{
        console.log(error);
      });
    },
    bookToAdd(title,description){
      let book = {
        title:title,
        description:description
      }
      axios.post(API_URL,book).then(response=>{
        this.books.push(response.data.book);
      }).catch(error=>{
        console.log(error);
      });
    },
    bookToDelete(id){
      axios.delete(API_URL+"/"+id).then(()=>{
        this.books = this.getAllBooks();
      }).catch(error=>{
        console.log(error);
      });
    }
  },
  mounted() {
    this.getAllBooks();
    console.log(API_URL);
  },
};
</script>

<style>
:root {
  --main-color: #3a2dfc;
}

* {
  box-sizing: border-box;
}

html {
  font-family: sans-serif;
}

body {
  margin: 0;
}

header {
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
  margin: 3rem auto;
  border-radius: 10px;
  padding: 1rem;
  background-color: var(--main-color);
  color: white;
  text-align: center;
  width: 90%;
  max-width: 40rem;
}

ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

button {
  cursor: pointer;
  border: 1px solid var(--main-color);
  background-color: var(--main-color);
  color: white;
  padding: 0.5rem 1rem;
  box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.26);
}

button:hover,
button:active {
  box-shadow: 1px 2px 6px rgba(0, 0, 0, 0.26);
}
</style>