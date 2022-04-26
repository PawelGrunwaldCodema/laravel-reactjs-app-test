import React, { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import { ToastContainer, toast } from 'react-toastify';

function UserAddView() {
    const navigate = useNavigate();
    const [roles, setRoles] = useState([]);
    const [user, setUser] = useState({full_name: '', email: '', roles: []});

    useEffect(() => {
        handleFetchRoles();
    },[]);

    const handleToast = (text, type) => {
        toast(text, {
            type: type,
            autoClose: 4000,
        });
    }

    const handleFetchRoles = () => {
        axios.get('/api/role/get')
            .then(({data}) => {
                const roles = data.roles;
                setRoles(roles);
            });
    };

    const handleOnChangeInputData = (event) => {
        setUser(prevState => ({
            ...prevState,
            [event.target.name]: event.target.value,
        }));
    }

    const handleOnChangeRole = (event) => {
        let value = Array.from(
            event.target.selectedOptions,
            (option) => option.value,
        )

        setUser(prevState => ({
            ...prevState,
            roles: value,
        }))
    }

    const handleSaveUser = (event) => {
        event.preventDefault();

        axios.post("/api/user/store", user)
            .then(({data}) => {
                if (data.status === 'success') {
                    setUser(prevState => ({
                        ...prevState,
                        full_name: '',
                        email: '',
                        roles: [],
                    }));

                    handleToast("Successfully added user: " + data.user.full_name, "success");
                    setTimeout(() => {
                        navigate("/");
                    }, 4000)
                }
            })
            .catch(() => {
                handleToast("An error occurred while adding user!", "error");
            });
    };

    return (
        <div>
             <form onSubmit={handleSaveUser} method="POST">
                 <div className="form-group">
                     <label htmlFor="input__full_name">Full Name</label>
                     <input
                         type="text"
                         name="full_name"
                         className="form-control"
                         id="input__full_name"
                         placeholder="Enter Full Name"
                         onChange={handleOnChangeInputData}
                         value={user.full_name}
                     />
                 </div>
                 <div className="form-group">
                     <label htmlFor="input__email">Email Address</label>
                     <input
                         type="email"
                         name="email"
                         className="form-control"
                         id="input__email"
                         placeholder="Enter Email Address"
                         onChange={handleOnChangeInputData}
                         value={user.email}
                     />
                 </div>
                 <div className="form-group">
                     <label htmlFor="input__roles">Roles</label>
                     <select
                         multiple
                         name="roles"
                         className="form-control"
                         id="input__roles"
                         style={{textTransform: 'capitalize'}}
                         onChange={handleOnChangeRole}
                         value={user.roles}
                     >
                         {
                             roles
                                 .map(role => {
                                     return <option key={role.id} value={role.name}>{role.name}</option>
                                 })
                         }
                     </select>
                 </div>
                 <button type="submit" className="btn btn-primary">Save</button>
             </form>
             <ToastContainer />
         </div>
    );
}

export default UserAddView;
