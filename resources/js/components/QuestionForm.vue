<template>
    <form action="/AddQuestion" method="post" id="questionForm">
        <input type="hidden" name="_token" v-bind:value="csrf">
        <div><textarea v-model="message" id="questionBox" name="question" placeholder="Enter question here" rows="4"  required></textarea></div>
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
            <div></div> 
            <button type="submit" class="standardBtn">Submit</button>
        </div>
    </form>

</template>


<script>
    export default {
        data() {
            return {
                formItems: [
                    {
                        label: 'Optimistic Answer',
                        id: 'oa',
                        type: 'text',
                        value: ''
                    },
                    {
                        label: 'Pessimistic Answer',
                        id: 'pessimistic',
                        type: 'text',
                        value: ''
                    },
                    {
                        label: 'Realist Answer',
                        id: 'realist',
                        type: 'text',
                        value: ''
                    },


                ],


                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

                
            }
        }
    }
</script>