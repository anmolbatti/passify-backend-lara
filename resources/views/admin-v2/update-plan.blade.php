   <form action="{{ route('admin.plan.update', $plan->id) }}" method="post" onsubmit="savePlan(this)">
       @csrf
       @method('PUT')
       <div class="form-group mb-3">
           <label for="name">Name*</label>
           <input type="text" id="name" placeholder="Plan Name" name="name" class="form-control"
               value="{{ $plan->plan_name }}">
       </div>

       <div class="form-group mb-3">
           <label for="price">Price*</label>
           <input type="number" id="price" placeholder="Price" name="price" class="form-control" min="0"
               value="{{ $plan->price }}">
       </div>

       <div class="form-group mb-3">
           <label for="plan">Plan Type*</label>
           <select name="plan_type" class="form-control" id="plan">
               <option value="monthly" {{ $plan->type == 'monthly' ? 'selected' : '' }}>Monthly</option>
               <option value="annual" {{ $plan->type == 'annual' ? 'selected' : '' }}>Annual</option>
           </select>
       </div>

       <div class="form-group mb-3">
           <label for="trial">Trial Period*</label>
           <input type="number" id="trial" placeholder="Trial Period In Days" name="trial_period_in_days"
               class="form-control" min="0" value="{{ $plan->trial_period_in_days }}">
       </div>

       <div class="form-group mb-3">
           <label for="design">Card Design Count*</label>
           <input type="number" id="design" placeholder="Card Design Count" name="card_design_count"
               class="form-control" min="0" value="{{ $plan->card_design_count }}">
       </div>

       <div class="form-group mb-3">
           <label for="location">Location Count*</label>
           <input type="number" id="location" placeholder="Location Count" name="location_count" class="form-control"
               min="0" value="{{ $plan->location_count }}">
       </div>

       <div class="form-group mb-3">
           <label for="subuser">Sub-user Count*</label>
           <input type="number" id="subuser" placeholder="Sub User Count" name="sub_user_count" class="form-control"
               min="0" value="{{ $plan->user_count }}">
       </div>

       <div class="form-group mb-3">
           <label for="location">Notification User Count*</label>
           <input type="number" id="location" placeholder="Notification User Count" name="notification_user_count"
               class="form-control" value="{{ $plan->notification_users_count }}" min="0">
       </div>

       <div class="form-group mb-3">
           <label for="plan">Exportable*</label>
           <select name="exportable" class="form-control" id="exportable">
               <option value="true" {{ $plan->exportable == 'true' ? 'selected' : '' }}>Yes</option>
               <option value="false"
                   {{ $plan->exportable == 'false' || is_null($plan->exportable) ? 'selected' : '' }}>No</option>
           </select>
       </div>

       <div class="form-group mb-3">
           <label for="plan">Status*</label>
           <select name="status" class="form-control" id="Status">
               <option value="1" {{ $plan->status == 1 ? 'selected' : '' }}>Active</option>
               <option value="0" {{ $plan->status == 0 ? 'selected' : '' }}>In-active</option>
           </select>
       </div>

       <x-primary-button class="h-25 bg-primary mt-3">Update</x-primary-button>

   </form>
