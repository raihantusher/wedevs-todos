<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Snippet - BBBootstrap</title>
                                <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
                                <link rel="stylesheet" href="style.css">

                         
                            </head>
                            <body>
                          
                    
                         
<div id="app">

    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Todo list</h4>
                            <div class="add-items d-flex"> <input v-on:keyup.enter="onEnter" v-model="newTodo" type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> </div>
                            <div class="list-wrapper">
                                <ul class="d-flex flex-column todo-list" >
                                    <li v-for="(todo,index) in todos.slice().reverse()" v-bind:class="[todo.done==1 ? 'completed' : '']">
                                        <div  class="form-check"> <label class="form-check-label"> <input class="checkbox" v-on:change="checkBoxOnChange(todo)" type="checkbox"  v-model="todo.done" true-value='1' false-value='0'> {{todo.todo}} <i class="input-helper"></i>  </label> </div> <i class="remove mdi mdi-close-circle-outline" v-on:click="Delete(todo)"></i>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div> {{todos.length}} items left</div>
                            <div>
                                <a href="#"  v-on:click="allTodo">All</a>
                                <a href="#" class="mx-1" v-on:click="activeTodo">Active</a>
                                <a href="#"  v-on:click="completedTodo">Completed</a>
                            </div>
                            <div>
                                <a href="#" v-on:click="clearCompletedTodo">Clear Completed</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</div>
 



       
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>

<script src="assets/vue.js"></script>
<script src="assets/axios.min.js"></script>


<script>
 var app = new Vue({
        el: '#app',
        data: {
            newTodo:'',
            todos:[]
        },

        methods:{
            Delete:function(todo){
                
               
             // console.log(this.todos);

               axios.delete('api.php', {
                data:{
                    // send id to delete that row
                   id:todo.id
                }
                })
                .then( (response)=> {
                    // reorganize all todos or array
                    this.todos=response.data;
                })
                .catch( (error)=> {
                   
                });  
            },
            onEnter:function(){
               
                axios.post('api.php', {
                    //new todo from input field
                    todo: this.newTodo,
                }).then((response)=>{
                    //push entered row on the todos array
                    this.todos.push(response.data);
                });
                // empty input field
                this.newTodo="";
            },
            checkBoxOnChange:function(todo){
                //post or set done/not-done on database
                axios.put("api.php", {
                    todo
                }).then(response=>{
                    
                });     
            },
            editTodo:function(evt,todo){
               // created for edit todo

            },
            allTodo:function(){
                 //allTodos 
                axios.get("api.php?todos=all")
                .then((response)=>{
                    this.todos=response.data;
                })
            },
            activeTodo:function(){
                 // active todos
                    axios.get("api.php?todos=active")
                    .then((response)=>{
                        this.todos=response.data;
                    })
                
            },
            completedTodo:function(){
                // completed todos 
                axios.get("api.php?todos=completed")
                    .then((response)=>{
                        this.todos=response.data;
                    })
            },
            clearCompletedTodo:function(){
                // send blank request to delete 
                // all the completed todos
                // to understand that concept 
                // you may read the TodoController@destroy section
                // and model Todo delete
                 axios.delete('api.php', {
                    data:{}
                    })
                .then( (response)=> {
                    this.todos=response.data;
                });
            }
        },

        mounted(){
            //allTodos
            axios.get("api.php?todos=all")
            .then((response)=>{
               
                this.todos=response.data;
            })
            
            //console.log(data);
        },
  

})
</script>
    
    </body>
</html>