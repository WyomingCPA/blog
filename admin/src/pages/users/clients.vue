<template>
  <section class="clients">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Водители</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>
                      <div class="form-check m-0">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox" /><i
                            class="input-helper"
                          ></i>
                        </label>
                      </div>
                    </th>
                    <th>Profile</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Products</th>
                    <th>Start Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="user in users" :key="user.id">
                    <td>
                      <div class="form-check m-0">
                        <label class="form-check-label">
                          <input class="checkbox" type="checkbox" /><i
                            class="input-helper"
                          ></i>
                        </label>
                      </div>
                    </td>
                    <td>
                      <img
                        src="../../assets/images/faces/face1.jpg"
                        alt="image"
                      />
                    </td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>6300</td>
                    <td>01/11/2017</td>
                    <td>
                      <i class="mdi mdi-pencil icon-sm mr-2 text-success"></i>
                      <i class="mdi mdi-close icon-sm text-danger"></i>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import axios from "axios";

export default {
  name: "adminClients",
  data() {
    return {
      users: [],
    };
  },
  methods: {
    fetchUserList() {
      axios
        .get("api/users/clients")
        .then((res) => {
          this.users = res.data;
          console.log(this.users);
        })
        .catch(function () {
          console.log(self.msg);
        });
    },
  },
  mounted: function () {
    this.fetchUserList();
  },
};
</script>