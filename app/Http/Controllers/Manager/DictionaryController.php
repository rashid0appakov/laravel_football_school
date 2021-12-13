<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Models\ClientType;
use App\Models\EntryPoint;
use App\Models\Lead;
use App\Models\LeadStatus;
use App\Models\LeadType;
use App\Models\Spec;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DictionaryController extends BaseController
{
    public function create_lead_status(Request $request)
    {
        $check_lead_name = LeadStatus::where('name', $request->name)->first();
        if ($check_lead_name != null)
        {
            return back()->withErrors(['Статус с таким именем уже существует']);
        }
        $lead_status = new LeadStatus();
        $lead_status->fill($request->all());
        $lead_status->save();

        return back()->with('success', 'Статус добавлен');
    }

    public function delete_lead_status($id)
    {
        $lead_status = LeadStatus::find($id);
        $lead = Lead::where('lead_status_id', $lead_status->id)->get();
        if (count($lead) > 0)
        {
            return back()->withErrors(['Статус используется в лидах']);
        }
        $lead_status->delete();
        return back()->with('success', 'Статус удален');
    }

    public function edit_lead_status(Request $request)
    {
        $check_lead_name = LeadStatus::where('name', $request->name)->first();
        if ($check_lead_name != null)
        {
            return back()->withErrors(['Статус с таким именем уже существует']);
        }
        $lead_status = LeadStatus::find($request->lead_status_id);
        $lead_status->fill($request->all());
        $lead_status->update();

        return back()->with('success', 'Статус изменен');
    }


    public function create_lead_type(Request $request)
    {
        $check_lead_name = LeadType::where('name', $request->name)->first();
        if ($check_lead_name != null)
        {
            return back()->withErrors(['Тип с таким названием уже существует']);
        }
        $lead_type = new LeadType();
        $lead_type->fill($request->all());
        $lead_type->save();

        return back()->with('success', 'Статус добавлен');
    }

    public function delete_lead_type($id)
    {
        $lead_type = LeadType::find($id);
        $lead = Lead::where('lead_type_id', $lead_type->id)->get();
        if (count($lead) > 0)
        {
            return back()->withErrors(['Тип используется в лидах']);
        }
        $lead_type->delete();
        return back()->with('success', 'Тип удален');
    }

    public function edit_lead_type(Request $request)
    {
        $check_lead_name = LeadType::where('name', $request->name)->first();
        if ($check_lead_name != null)
        {
            return back()->withErrors(['Тип с таким названием уже существует']);
        }
        $lead_type = LeadType::find($request->lead_type_id);
        $lead_type->fill($request->all());
        $lead_type->update();

        return back()->with('success', 'Тип изменен');
    }


    public function create_client_type(Request $request)
    {
        $check_client_type_name = ClientType::where('name', $request->name)->first();
        if ($check_client_type_name != null)
        {
            return back()->withErrors(['Тип с таким названием уже существует']);
        }
        $client_type = new ClientType();
        $client_type->fill($request->all());
        $client_type->save();

        return back()->with('success', 'Тип клиента добавлен');
    }

    public function delete_client_type($id)
    {
        $client_type = ClientType::find($id);
        $lead = Lead::where('client_type_id', $client_type->id)->get();
        if (count($lead) > 0)
        {
            return back()->withErrors(['Тип используется в лидах']);
        }
        $client_type->delete();
        return back()->with('success', 'Тип удален');
    }

    public function edit_client_type(Request $request)
    {
        $check_client_type_name = ClientType::where('name', $request->name)->first();
        if ($check_client_type_name != null)
        {
            return back()->withErrors(['Тип с таким названием уже существует']);
        }
        $client_type = ClientType::find($request->client_type_id);
        $client_type->fill($request->all());
        $client_type->update();

        return back()->with('success', 'Тип изменен');
    }


    public function create_spec(Request $request)
    {
        $check_spec_name = Spec::where('name', $request->name)->first();
        if ($check_spec_name != null)
        {
            return back()->withErrors(['Тип с таким названием уже существует']);
        }
        $spec = new Spec();
        $spec->fill($request->all());
        $spec->save();

        return back()->with('success', 'Тип добавлен');
    }

    public function delete_spec($id)
    {
        $spec = Spec::find($id);
//        $lead = Lead::where('spec_id', $spec->id)->get();
//        if (count($lead) > 0)
//        {
//            return back()->withErrors(['Тип используется в лидах']);
//        }
        $spec->delete();
        return back()->with('success', 'Тип удален');
    }

    public function edit_spec(Request $request)
    {
        $check_spec_name = Spec::where('name', $request->name)->first();
        if ($check_spec_name != null)
        {
            return back()->withErrors(['Тип с таким названием уже существует']);
        }
        $spec = Spec::find($request->spec_id);
        $spec->fill($request->all());
        $spec->update();

        return back()->with('success', 'Тип изменен');
    }


    public function create_channel(Request $request)
    {
        $check_channel_name = Channel::where('name', $request->name)->first();
        if ($check_channel_name != null)
        {
            return back()->withErrors(['Тип с таким названием уже существует']);
        }
        $channel = new Channel();
        $channel->fill($request->all());
        $channel->save();

        return back()->with('success', 'Тип добавлен');
    }

    public function delete_channel($id)
    {
        $channel = Channel::find($id);
        $lead = Lead::where('channel_id', $channel->id)->get();
        if (count($lead) > 0)
        {
            return back()->withErrors(['Тип используется в лидах']);
        }
        $channel->delete();
        return back()->with('success', 'Тип удален');
    }

    public function edit_channel(Request $request)
    {
        $check_channel_name = Channel::where('name', $request->name)->first();
        if ($check_channel_name != null)
        {
            return back()->withErrors(['Тип с таким названием уже существует']);
        }
        $channel = Channel::find($request->channel_id);
        $channel->fill($request->all());
        $channel->update();

        return back()->with('success', 'Тип изменен');
    }

    public function create_entry_point(Request $request)
    {
        $check_entry_point_name = Channel::where('name', $request->name)->first();
        if ($check_entry_point_name != null)
        {
            return back()->withErrors(['Тип с таким названием уже существует']);
        }
        $entry_point = new EntryPoint();
        $entry_point->fill($request->all());
        $entry_point->save();

        return back()->with('success', 'Тип добавлен');
    }

    public function delete_entry_point($id)
    {
        $entry_point = EntryPoint::find($id);
        $lead = Lead::where('channel_id', $entry_point->id)->get();
        if (count($lead) > 0)
        {
            return back()->withErrors(['Тип используется в лидах']);
        }
        $entry_point->delete();
        return back()->with('success', 'Тип удален');
    }

    public function edit_entry_point(Request $request)
    {
        $check_entry_point_name = EntryPoint::where('name', $request->name)->first();
        if ($check_entry_point_name != null)
        {
            return back()->withErrors(['Тип с таким названием уже существует']);
        }
        $entry_point = EntryPoint::find($request->entry_point_id);
        $entry_point->fill($request->all());
        $entry_point->update();

        return back()->with('success', 'Тип изменен');
    }
}
