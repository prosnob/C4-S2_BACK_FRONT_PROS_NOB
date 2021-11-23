<template>
  <form @submit.prevent="onAddBook">
    <div>
      <input type="text" v-model="title" placeholder="Title" autofocus/>
    </div>

    <div>
      <input type="text" v-model="description" placeholder="Description"/>
    </div>
    <div class="add">
      <button type="submit">Add Book</button>
    </div>
  </form>
</template>

<script>
export default {
  emits: ["addBook"],
  data() {
    return {
      title : null,
      description : null,
    };
  },
  methods: {
    onAddBook(){
      this.$emit("addBook",this.title,this.description);
    }
  },
};
</script>

<style scoped>
form {
  margin: 2rem auto;
  max-width: 40rem;
  padding: 1rem;
  border-radius: 12px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
  border-left: 3px solid #0E2EE1;
}

form div {
  margin: 1rem 0;
}

input {
  padding: 0.6rem;
  width: 100%;
}
label {
  font-weight: bold;
  margin-right: 1rem;
  width: 7rem;
  display: inline-block;
  color: #777;
  font-size: 15px;
  padding: 10px 0;
}
::placeholder {
  font-style: italic;
  letter-spacing:1px
}
.add {
  display: flex;
  justify-content: flex-end;
}
</style>