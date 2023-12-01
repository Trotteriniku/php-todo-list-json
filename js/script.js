const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl:'server.php',
      todolist:[],
      newTask:"",
    };
  },
  methods: {
    readList(){
      axios.get(this.apiUrl).then((response)=> {
          
          this.todolist = response.data
      })
    },
    addTask(){
      if(this.newTask == ""){
        return;
      }
      const data = new FormData();
      data.append("task", this.newTask);
      
      axios.post(this.apiUrl, data).then((response) =>{
        this.todolist = response.data;
      })
      
      this.newTask="";
    },
    markToggle(index){
      const data = new FormData();
      data.append("index", index);
      
      axios.post(this.apiUrl, data).then((response) =>{
        this.todolist = response.data;
      })
    }
  },

  mounted() {
    this.readList();
  },
}).mount("#app");


