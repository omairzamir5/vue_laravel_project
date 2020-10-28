<template>
	 <div>
    <vs-table :data="users">
      <template slot="header">
        <h3>
          Users
        </h3>
      </template>
      <template slot="thead">
        <vs-th>
          Email
        </vs-th>
        <vs-th>
          Name
        </vs-th>
        <vs-th>
          Website
        </vs-th>
        <vs-th>
          Nro
        </vs-th>
      </template>

      <template slot-scope="{users}">
        <vs-tr :key="indextr" v-for="(tr, indextr) in users" >
          <vs-td :users="users[indextr].fullname">
            {{users[indextr].fullname}}
          </vs-td>

          <vs-td :users="users[indextr].email">
            {{users[indextr].email}}
          </vs-td>

          <vs-td :users="users[indextr].phone">
            {{users[indextr].phone}}
          </vs-td>

          <vs-td :users="users[indextr].id">
            {{users[indextr].id}}
          </vs-td>
        </vs-tr>
      </template>
    </vs-table>
  </div>
</template>
	
<script>
export default {
	computed: {
  users() {
	  console.log(this.$store.state.users['users']);
    return this.$store.state.users['users'];
  }
},
created() {
  this.$store.dispatch('loadUsers');
}
		
}
</script>