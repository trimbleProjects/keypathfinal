<template>
    <form action="/AddQuestion" method="post" id="questionForm">
        <div><textarea v-model="message" id="message" placeholder="Question" rows="12" required></textarea></div>
        <div v-for="item in formItems" :key="item.id" class="form-item">
        <label :for="item.id">{{ item.label }}: </label>
        <input
            :type="item.type"
            :id="item.id"
            :name="item.id"
            v-model="item.value"
            required
        />
        </div>
        <div class="form-item">
            <label for="reason">Reason:</label>
            <select id="reason" required>
                <option v-for="item in options" :key="item.id" :selected="item.selected">{{item.value}}</option>
            </select>
        </div>
        
        <div class="form-item">
            <div></div>
            <button type="submit">Submit</button>
        </div>
    </form>

</template>


<script>
    export default {
        data() {
            return {
                formItems: [
                    {
                        label: 'Name',
                        id: 'name',
                        type: 'text',
                        value: ''
                    },
                    {
                        label: 'Email',
                        id: 'email',
                        type: 'email',
                        value: ''
                    },


                ],
                options: [
                    {
                        id:'Inquiry',
                        value:'Inquiries',
                    },
                    {
                        id:'other',
                        value:'Other'
                    }
                ]
            }
        }
    }
</script>